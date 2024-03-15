@extends('layout.app')

@section('content')



<h1 class="m-3">JoB details</h1>
<div class="card w-50 border-1">
    <div class="card-body">
     <div class ="fs-3">Company name : </div>
      <h3 id="company"></h3>
      <div class ="fs-3">Job title : </div>
      <h3 id="title"></h3>
      <div class ="fs-3">Skills are following : </div>
      <div id="skills"></div>
      <div class ="fs-3">Requirements are following : </div>
      <h5 id="requirements"></h5>
      <div class ="fs-3">Experience : </div>
      <h5 id="experience"></h5>
      <div class ="fs-3">Job deadline : </div>
      <h5 id="deadline"> </h5>

      <a type="button" class = "btn btn-info" href="/" >Home</a>




      <div class="cart_btn">
        <button onclick="applyJob()" class="btn btn-fill-out btn-info btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Apply Now</button>
        <button onclick="AddToWishList()" class="btn btn-fill-out btn-info btn-addtocart" type="button"><i class="icon-basket-loaded"></i>Wish</button>

    </div>
    </div>
  </div>

  <script>



            let searchParams = new URLSearchParams(window.location.search);
            let id = searchParams.get('id');




            jobDetails();


            async function jobDetails() {

            let searchParams = new URLSearchParams(window.location.search);
            let id = searchParams.get('id');

            let res = await axios.get("/JobDetailsById/"+id);
            let Details=await res.data['data'];

            document.getElementById('company').innerHTML=`<div class = "text-info"><span class="badge bg-danger">${Details[0]['company']['name']}</span></div>`;

            document.getElementById('title').innerHTML=`<div class = "text-info"><span class="badge bg-danger">${Details[0]['title']}</span></div>`;




            document.getElementById('experience').innerText=Details[0]['experience'];
            document.getElementById('deadline').innerHTML=`<div class = "text-danger">${Details[0]['deadline']}</div>`;





            let req= Details[0]['requirements'].split(',');

            req.forEach((x)=>{
                let optionm=`<ul>
                    <li>${x}</li>
                    </ul>`;
                $("#requirements").append(optionm);
            })

            let skill=Details[0]['skill'].split(',');

            skill.forEach((x)=>{
                let option1=`<Div class = "col-1 ">
                    <span class="badge bg-success text-white">${x}</span>
                    </Div>`;
                $("#skills").append(option1);
            });
        }



    async function applyJob(){
        try {
//
////// ///////Get the current date
//const currentDate = new Date();

/////// Extract year, month, and day components
//const year = currentDate.getFullYear();
//const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
//const day = String(currentDate.getDate()).padStart(2, '0');

// Format the date as YYYY-MM-DD
//const formattedDate = `${year}-${month}-${day}`;

// Send a POST request with the job_id and date

let title =document.getElementById('title').value;
let experience =document.getElementById('experience').value;
let res = await axios.post("/job-apply",{

    "job_id":id,
    "title": title,
    "experience": experience
});
$(".preloader").delay(90).fadeOut(100).addClass('loaded');
if(res.status===200){
    alert("Request is Successful")
}

} catch(e) {
if (e.response.status === 401) {
sessionStorage.setItem("last_location",window.location.href)
window.location.href = "admin-login"
}
}

       }


       async function AddToCart() {
        try {
            let p_size=document.getElementById('p_size').value;
            let p_color=document.getElementById('p_color').value;
            let p_qty=document.getElementById('p_qty').value;

            if(p_size.length===0){
                alert("Product Size Required !");
            }
            else if(p_color.length===0){
                alert("Product Color Required !");
            }
            else if(p_qty===0){
                alert("Product Qty Required !");
            }
            else {
                $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
                let res = await axios.post("/CreateCartList",{
                    "product_id":id,
                    "color":p_color,
                    "size":p_size,
                    "qty":p_qty
                });
                $(".preloader").delay(90).fadeOut(100).addClass('loaded');
                if(res.status===200){
                    alert("Request Successful")
                }
            }

        } catch (e) {
            if (e.response.status === 401) {
                sessionStorage.setItem("last_location",window.location.href)
                window.location.href = "/login"
            }
        }
    }



    async function AddToWishList() {
        try{
            let searchParams = new URLSearchParams(window.location.search);
            let id = searchParams.get('id');
            $(".preloader").delay(90).fadeIn(100).removeClass('loaded');
            let res = await axios.get("/CreateJobWishList/"+id);
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            if(res.status===200){
                alert("Request Wish Successful")
            }
        }catch (e) {
            if(e.response.status===401){
                sessionStorage.setItem("last_location",window.location.href)
                window.location.href="/candidateLogin"
            }
        }
    }







  </script>


@endsection
