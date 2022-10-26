<?php

declare(strict_types=1);

namespace Modules\Theme\Models;

use Carbon\Carbon;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Modules\Theme\Exceptions\CouldNotAddUpload;
use Modules\Theme\Exceptions\TemporaryUploadDoesNotBelongToCurrentSession;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Modules\Theme\Models\TemporaryUpload.
 *
 * @property int                                                                              $id
 * @property string                                                                           $session_id
 * @property \Illuminate\Support\Carbon|null                                                  $created_at
 * @property string|null                                                                      $created_by
 * @property \Illuminate\Support\Carbon|null                                                  $updated_at
 * @property string|null                                                                      $updated_by
 * @property \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|Media[] $media
 * @property int|null                                                                         $media_count
 *
 * @method static Builder|TemporaryUpload newModelQuery()
 * @method static Builder|TemporaryUpload newQuery()
 * @method static Builder|TemporaryUpload old()
 * @method static Builder|TemporaryUpload query()
 * @method static Builder|TemporaryUpload whereCreatedAt($value)
 * @method static Builder|TemporaryUpload whereCreatedBy($value)
 * @method static Builder|TemporaryUpload whereId($value)
 * @method static Builder|TemporaryUpload whereSessionId($value)
 * @method static Builder|TemporaryUpload whereUpdatedAt($value)
 * @method static Builder|TemporaryUpload whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class TemporaryUpload extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['id', 'session_id', 'created_at', 'created_by', 'updated_at', 'updated_by'];

    protected $guarded = [];

    public static ?Closure $manipulatePreview = null;

    public static ?string $disk = null;

    public function scopeOld(Builder $builder): void
    {
        $builder->where('created_at', '<=', Carbon::now()->subDay()->toDateTimeString());
    }

    public function registerMediaConversions(Media $media = null): void
    {
        if (! config('media-library.generate_thumbnails_for_temporary_uploads')) {
            return;
        }

        $conversion = $this
            ->addMediaConversion('preview')
            ->nonQueued();

        $previewManipulation = $this->getPreviewManipulation();

        $previewManipulation($conversion);
    }

    public static function previewManipulation(Closure $closure): void
    {
        static::$manipulatePreview = $closure;
    }

    protected function getPreviewManipulation(): Closure
    {
        return static::$manipulatePreview ?? function (Conversion $conversion) {
            $conversion->fit(Manipulations::FIT_CROP, 300, 300);
        };
    }

    protected static function getDiskName(): string
    {
        return static::$disk ?? config('media-library.disk_name');
    }

    public static function findByMediaUuid(?string $mediaUuid): ?self
    {
        $mediaModelClass = config('media-library.media_model');

        /** @var Media $media */
        $media = $mediaModelClass::query()
            ->where('uuid', $mediaUuid)
            ->first();

        if (! $media) {
            return null;
        }

        $temporaryUpload = $media->model;

        if (! $temporaryUpload instanceof self) {
            return null;
        }

        return $temporaryUpload;
    }

    public static function findByMediaUuidInCurrentSession(?string $mediaUuid): ?self
    {
        if (! $temporaryUpload = static::findByMediaUuid($mediaUuid)) {
            return null;
        }

        if (config('media-library.enable_temporary_uploads_session_affinity', true)) {
            if ($temporaryUpload->session_id !== session()->getId()) {
                return null;
            }
        }

        return $temporaryUpload;
    }

    public static function createForFile(
        UploadedFile $file,
        string $sessionId,
        string $uuid,
        string $name
    ): self {
        /** @var \Spatie\MediaLibraryPro\Models\TemporaryUpload $temporaryUpload */
        $temporaryUpload = static::create([
            'session_id' => $sessionId,
        ]);

        if (static::findByMediaUuid($uuid)) {
            throw CouldNotAddUpload::uuidAlreadyExists();
        }

        $temporaryUpload
            ->addMedia($file)
            ->setName($name)
            ->withProperties(['uuid' => $uuid])
            ->toMediaCollection('default', static::getDiskName());

        return $temporaryUpload->fresh();
    }

    public function moveMedia(HasMedia $toModel, string $collectionName, string $diskName, string $fileName): Media
    {
        if (config('media-library.enable_temporary_uploads_session_affinity', true)) {
            if ($this->session_id !== session()->getId()) {
                throw TemporaryUploadDoesNotBelongToCurrentSession::create();
            }
        }

        $media = $this->getFirstMedia();

        $temporaryUploadModel = $media->model;
        $uuid = $media->uuid;

        $newMedia = $media->move($toModel, $collectionName, $diskName, $fileName);
        $newMedia->update(compact('uuid'));

        $temporaryUploadModel->delete();

        return $newMedia;
    }
}
