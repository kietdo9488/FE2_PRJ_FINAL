<template>
    <div class="container">
    <!-- Hiển thị dữ liệu từ API -->
    <button type="button" class="btn btn_add" >
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
    Thêm bệnh nhân
    </button>
    <div class="table-container">
    
    <table>
      <tr class="title_table">
        <th>ID</th>
        <th>Full Name</th>
        <th>Gender</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
      <tr v-for="item in data" :key="item['id']">
        <td>{{ item.id }}</td>
        <td>{{ item.full_name }}</td>
        <td>{{ item.gender }}</td>
        <td>{{ item.date_of_birth }}</td>
        <td>{{ item.address  }}</td>
        <td>{{ item.phone_number }}</td>
        <td>{{ item.email }}</td>
        <td>
      <div>
      <button @click="showConfirmation(item)">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg>
      </button>
      </div>
      <div> 
      <button @click="sendData(item)">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg></button></div>
      </td>
      </tr>
    </table>
    </div>
    <td>{{ patient.id }}</td>
<td>{{ patient.full_name }}</td>
<td>{{ patient.gender }}</td>
<td>{{ patient.date_of_birth }}</td>
<td>{{ patient.address }}</td>
<td>{{ patient.phone_number }}</td>
<td>{{ patient.email }}</td>
  </div>
</template>

<script>
import 'bootstrap/dist/js/bootstrap.js'

import axios from 'axios';
export default {
  data() {
    return {
      data: {}, // Dữ liệu từ API sẽ được lưu ở đây
      patient:{},
    };
  },
  computed: {
    keys() {
      return Object.keys(this.data);
    }
  },
  mounted() {
    this.getDataFromApi();
  },
  methods: {
    getDataFromApi() {
      axios.get('http://127.0.0.1:8000/api/patient/all')
        .then(response => {
          this.data = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    showConfirmation(item) {
    if (confirm(`Bạn có chắc chắn muốn xóa "${item.full_name}" chứ?`))  {
        // Thực hiện hành động xóa
        this.deleteItem(item);
        }
    },
    sendData(item){
        this.getPatientFromApi(item);
    },
     getPatientFromApi(item) {
      axios.get('http://127.0.0.1:8000/api/patient/'+item.id)
        .then(response => {
          this.patient = response.data;
          console.log(response.data); 
        })
        .catch(error => {
          console.error(error);
        });
    },
    deleteItem(item) {
  axios.delete('http://127.0.0.1:8000/api/patient/'+item.id)
    .then(() => {
      // Xóa thành công
       alert('Đã xóa!');
           this.getDataFromApi();
    })
    .catch(error => {
      // Xử lý lỗi
      console.error(error);
      // Hiển thị thông báo lỗi cho người dùng
      alert('Có lỗi xảy ra khi xóa mục. Vui lòng thử lại sau.');
    });
},
  },
};
</script>

<style scoped>
@import '~bootstrap/dist/css/bootstrap.min.css';

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
.title_table {
background: rgba(38, 194, 129) !important;
}

td, th { 
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

tr:hover {
background:rgb(183, 244, 216);
}
tr{
 transitions: all 0.5s ease-in-out;
}
.btn{
  display:inline-block;
}

 td div {
    width: 50%;
    float: left;
  }

.table-container {
  height: 800px;
  overflow: auto;
}
.btn_add {
    background: rgba(38, 194, 129);
    margin-bottom: 20px;
    color: #fff;
    
}
</style>