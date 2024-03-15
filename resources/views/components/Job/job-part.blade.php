@extends('layout.app')
<section class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto text-center">
                <span class="text-muted fs-1">Job Categories </span>
                <p class="lead text-muted">Browse your desired job category kk</p>
            </div>
        </div>
        <br/>
        <div class="row">

            <h1>Category List</h1>
            <div class="row p-3 d-flex">


                @foreach ($categories as $category)
                    <div class="card-body col-md-4 m-2 bg-success text-white">
                             <h5 class="card-title">


                                    {{ $category->name }}

                             </h5>


                    </div>
                    @endforeach


            </div>






        </div>
    </div>
</section>

{{-- <script>
    TopCategory();

    async function TopCategory(){
        let res=await axios.get("list-category");
        $("#CategoryPart").empty()
        res.data['data'].forEach((item,i)=>{
            let EachItem= `<div class="p-2 col-2">
                <div class="item">
                    <div class="categories_box">

                        ${item['name']}
                        </a>
                    </div>
                </div>
            </div>`
            $("#CategoryPart").append(EachItem);
        })
    }
</script> --}}










