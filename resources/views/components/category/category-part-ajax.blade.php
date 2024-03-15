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


        </div>
        <div id="categoryCounts" class="row align-items-center">


        </div>
    </div>
</div>


<script>
    TopCategory();
    async function TopCategory(){
        let res=await axios.get("/CategoryList2");
        $("#TopCategoryItem").empty()
        res.data['data'].forEach((item,i)=>{
            let EachItem= `<div class="card border bg-info text-center text-white p-2 col-3">


                        <a href="/by-category-home?id=${item['id']}">

                            <span>${item['name']}</span>
                        </a>

                </div>
            </div>`
            $("#TopCategoryItem").append(EachItem);
        })
    }
</script>



<script>
    CatCounti();
    async function CatCounti(){
        let searchParams=new URLSearchParams(window.location.search);
        let id=searchParams.get('id');

        let res=await axios.get(`/cat-qty/${id}`);

        $("#categoryCounts").empty()
        res.data['data'].forEach((item,i)=>{
            let EachItem= `<div class="card border bg-info text-center text-success p-2 col-3">
                            <span>${item}</span>
                          </div>`;
            $("#categoryCounts").append(EachItem);
        })
    }
</script>





















<script>
    Sum();
    async function Sum(){
        let res=await axios.get("/sum");
        $("#TopCategoryItem").empty()
        res.data['data'].forEach((item,i)=>{
            let EachItem= `<div class="card border bg-info text-center text-danger  p-2 col-3">



                            <span>${categories}</span>


                </div>
            </div>`
            $("#TopCategoryItem").append(EachItem);
        })
    }
</script>

