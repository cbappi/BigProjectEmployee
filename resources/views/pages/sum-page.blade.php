<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Categories</h2>
                </div>
                <p class="text-center leads">Browse your required categories</p>
            </div>
        </div>
        <div id="TopCategoryItem" class="row align-items-center">
            @foreach($categories as $category)
            <p>{{ $category->name }}: {{ $category->total }}</p>
        @endforeach

        </div>
    </div>
</div>




