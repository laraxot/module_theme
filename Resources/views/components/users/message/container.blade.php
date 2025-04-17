<!--extends _pug-includes/layout.pug-->
<section id="{{ $attrs['id'] }}" class="py-5">
    <div class="container">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb ps-0  justify-content-start">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="user-account.html">Account</a></li>
            <li class="breadcrumb-item active">Messages </li>
        </ol>
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="hero-heading mb-0">Inbox</h1><a class="btn btn-link text-muted" href="#">Archived Messages</a>
        </div>
        <div class="d-flex justify-content-between align-items-end mb-4">
            <select class="selectpicker me-3 mb-3 mb-lg-0" name="bulk" id="form_bulk" data-style="btn-selectpicker"
                title="Bulk Actions">
                <option value="bulk_0">Edit </option>
                <option value="bulk_1">Archive </option>
                <option value="bulk_2">Delete </option>
            </select>
            <div>
                <label class="form-label me-2" for="form_sort">Sort by</label>
                <select class="selectpicker me-3 mb-3 mb-lg-0" name="sort" id="form_sort" data-style="btn-selectpicker"
                    title="">
                    <option value="sortBy_0">Newest </option>
                    <option value="sortBy_1">Oldest </option>
                    <option value="sortBy_2">Paid </option>
                </select>
            </div>
        </div>
        <div class="list-group shadow mb-5">
            {{ $slot }}
        </div>
    </div>
</section>
