<?php

declare(strict_types=1);

/**
 * Application configuration.
 */
$root_path = realpath(dirname(__DIR__));

$config = [];
$config['app_title'] = 'Video Editor'; //Title of the application
$config['app_description'] = 'Online Video Editor where you can cut, join and convert videos.';
$config['lang'] = 'en';
$config['version'] = '1.2.4';

$config['base_url'] = '/'; //Base URL (address without "http://domain.com")
$config['home_url'] = ''; //Home URL
$config['logo_image'] = $config['base_url'].'assets/img/logo_sm.png'; //Logo image URL
$config['root_path'] = $root_path.'/'; //Root path
$config['public_path'] = $root_path.'/public/'; //Path of the "public" folder
$config['input_dir'] = 'userfiles/input/'; //The address of the folder "input" (without "/" at the beginning)
$config['output_dir'] = 'userfiles/output/'; //The address of the folder "output" (without "/" at the beginning)
$config['tmp_dir'] = 'userfiles/tmp/'; //The address of the folder "tmp" (without "/" at the beginning)
$config['database_dir'] = 'database/'; //The address of the folder "database" (without "/" at the beginning)

$config['max_log_size'] = 700 * 1024; //Log size limit
$config['log_filename'] = 'log.txt'; //File name of the log
$config['queue_size'] = 5; //Queue size
$config['environment'] = 'dev'; //prod | dev

$config['ffmpeg_path'] = '/usr/bin/ffmpeg'; //FFmpeg path on your server
$config['ffprobe_path'] = '/usr/bin/ffprobe'; //FFprobe path on your server
$config['debug'] = false; //Debug mode
$config['upload_allowed'] = ['mp4', 'm4v', 'flv', 'avi', 'mov', 'avi', 'mkv', 'mpg', 'webm', '3gp', 'ogv', 'mpg', 'wmv']; //Allowed to upload
$config['upload_images'] = ['jpg', 'jpeg', 'png'];
$config['upload_audio'] = ['mp3', 'm4a'];

$config['watermark_text'] = ''; //Watermark text for all processed video
$config['watermark_text_font_name'] = 'libel-suit-rg.ttf'; //Font file name in folder assets/fonts/

$config['authentication'] = false; //Authentication
$config['admin_auth_email'] = 'aaa@bbb.cc'; //Email of the Admin (Facebook or Google account)
$config['user_blocked_default'] = false; //Users blocked by default

$config['facebook_app_id'] = ''; //Facebook App ID
$config['facebook_secret_key'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx'; //Facebook App Secret

$config['google_client_id'] = ''; //Google Client ID
$config['google_secret_key'] = 'xxxxxxxxxxxxxxxxxx'; //Google secret key

//Mail settings
$config['email_smtp'] = [
    'host' => 'smtp.postmarkapp.com',
    'port' => '25',
    'email_from' => 'support@mydomain.com',
    'username' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
    'password' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
    'secure' => 'tls',
    'auth' => true,
];

//FFmpeg conversion parameters
$config['ffmpeg_string_arr'] = [
    'flv' => '-c:v flv -b:v {quality} -c:a libmp3lame -b:a 128k -f {format}',
    'mp4' => '-c:v libx264 -b:v {quality} -c:a aac -strict experimental -b:a 128k -f {format}',
    'webm' => '-c:v libvpx -b:v {quality} -c:a libvorbis -b:a 128k -f {format}',
    'ogv' => '-c:v libtheora -b:v {quality} -c:a libvorbis -b:a 128k',
    'mp3' => '-vn -c:a libmp3lame -ab 192k -f {format}',
];

//Users restrictions
$config['users_restrictions'] = [
    'admin' => [
        'files_size_max' => 0, //Maximum of the files size
        'show_log' => true, //Show log messages
    ],
    'user' => [
        'files_size_max' => 300 * 1024 * 1024, //300 MB
        'show_log' => true,
    ],
];

return $config;
