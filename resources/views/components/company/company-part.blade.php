@extends('layout.app')


<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Companies</h2>
                </div>
                <p class="text-center leads">Get top companies information.</p>
            </div>
        </div>
        <div id="TopCompany" class="row align-items-center">


        </div>
    </div>
</div>


<script>

    async function TopCompany(){
        let res=await axios.get("/com-view");
        $("#TopCompany").empty()
        res.data['data'].forEach((item,i)=>{
            let EachItem= `<div class="card bg-info text-white text-center mx-2 p-2 col-2">




                            <span>${item['name']}</span>

            </div>`
            $("#TopCompany").append(EachItem);
        })
    }
</script>

