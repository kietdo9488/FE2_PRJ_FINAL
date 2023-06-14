
<template>
  <div id="app">
  
  <nav class="navbar navbar-expand-lg  nav">
  <div class="container">
    <a class="navbar-brand logo" href="#" @click="changeComponent('appHome')">HOSPITAL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#" @click="changeComponent('appMain')">Trang chủ</a>
        <li class="nav-item">
          <a class="nav-link" href="#" @click="changeComponent('appPatientFilter')">Lọc bệnh nhân</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" @click="changeComponent('appPrescription')">Danh sách đơn thuốc</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" @click="changeComponent('appDoctor')">Danh sách bác sĩ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" @click="changeComponent('appAppoint')">Danh sách lịch hẹn</a>
        </li>
      </ul>
    </div>    
  </div>   
</nav>
<div class="container bottom">
    <div class="content">
      <component :is="selectedComponent"></component>
    </div>
    
    <footer class="footer_css">
      <div class="row">
        <div class="col-md-4 ft">
        <div class="name">KHOA CÔNG NGHỆ THÔNG TIN</div>
        -Trường Cao Đẳng Công Nghệ Thủ Đức
        53 Võ Văn Ngân, Phường Linh Chiểu, TP. Thủ Đức, TP. HCM - Phòng B115
        <br>
        -Điện thoại: (028) 22 158 642; Nội bộ: 309
        <br>
        -Email: fit@tdc.edu.vn
      <br>
        -Facebook: facebook.com/tdc.fit
<br>
        -Youtube: youtube.com/fit-tdc
<br>
        -LinkedIn: linkedin.com/school/fit-tdc
        </div>
        <div class="col-md-4 ft">
        <div class="name">GIOI THIEU</div>
        -Trường Cao Đẳng Công Nghệ Thủ Đức
        53 Võ Văn Ngân, Phường Linh Chiểu, TP. Thủ Đức, TP. HCM - Phòng B115
        <br>
        </div>
        <div class="col-md-4 ft">

        <div class="name">LIEN HE</div>

        </div>
      </div>
    </footer>
</div>






  </div>


</template>

<script>
import HomePage from './components/HomePage.vue';
import AppointList from './components/AppointList.vue';
import DoctorListPage from './components/DoctorListPage.vue';
import PatientFilterPage from './components/PatientFilterPage.vue';
import PrescriptionListPage from './components/PrescriptionListPage.vue';
import MainPage from './components/MainPage.vue';

export default {
  data: function() {
    return {
      selectedComponent: 'appHome'
    };
  },
  components: {
    appHome: HomePage,
    appMain: MainPage,
    appPatientFilter: PatientFilterPage,
    appAppoint: AppointList,
    appPrescription: PrescriptionListPage,
    appDoctor: DoctorListPage,
  },
  methods: {
    changeComponent(componentName) {
      this.selectedComponent = componentName;
    }
  }
}
</script>

<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
#app {
  margin-top:20px;
}
.content {
  margin-top:30px;
  
}
.logo {
  font-weight:bold;
}
.navbar{
  background:rgba(38, 194, 129);
  color: #fff;
  top:0 !important;
}
.navbar.nav .navbar-nav .nav-link {
    color: white;
    margin:0px 10px;
}


.footer_css {
  position: relative;
  margin-top: 20px;
  bottom: 0;
  width:100%;
  height: 100%;
  color: #fff;
  background:rgba(38, 194, 129);
  
}
.name {
  font-weight:bold;
}
.ft {
  padding:50px 50px;
}
</style>
