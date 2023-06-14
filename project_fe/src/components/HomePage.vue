<template>
    <div class="home">
      <div class="title"> <h1>BỆNH VIỆN TÂM THẦN NAM SÀI GÒN</h1>
       <div class="slogan">Danh dự - Trách nhiệm - Đạo đức</div>
       </div>
       <div class="wrapper_caroul">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
         <div class="carousel-item active">
       <img src="/images/banner1.jpg" class="d-block" alt="#">
      </div>
      <div class="carousel-item">
      <img src="/images/banner2.jpg" class="d-block" alt="#">
     </div>
     <div class="carousel-item">
      <img src="/images/banner3.jpg" class="d-block" alt="#">
     </div>
      </div>
</div>
       </div>
       <div class="map">
      <h3 class="ar">Địa chỉ bệnh viện</h3>
      <iframe class="address" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13184.520461281329!2d106.67038701138836!3d10.751324961505738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e6084474d99%3A0x3c4f65f59614a93f!2zQuG7h25oIFZp4buHbiBUw6JtIFRo4bqnbg!5e0!3m2!1svi!2s!4v1686722014894!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>  
</template>

<script>
import 'bootstrap/dist/js/bootstrap.js'
export default {
    
}
</script>

<style scoped>
import 'bootstrap/dist/css/bootstrap.css'
    
.home {
    text-align: center;
}
.title {
 font-weight: bold;
 color: #4F5453;
 text-align: center;
 margin-bottom: 30px;
}
.slogan{
    font-size:20px;
    color: #4F5453452;
}
.wrapper_caroul{
    height: 700px !important;
    overflow: hidden;
}
.wrapper_caroul img{
    width: 100%;
    height: 800px;
    background-size: cover;
}
.address {
  width: 100%;
}
.ar {
   font-weight: bold;
 color: #4F5453;
 text-align: center;
 margin-bottom: 30px;
 margin-top: 50px;
}
</style>
