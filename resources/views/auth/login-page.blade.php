@extends('layout.authlayout');
@section('title','Login Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <div class="home_page">
        <div class="port_wr">
           <div class="main-bg">
               <div class="container">
                   <div class="row justify-content-center mt-5">
                       <div class="col-lg-4 col-md-6 col-sm-6">
                           <div class="card shadow">
                               <div class="card-title text-center border-bottom">
                                   <h2 class="p-3">Login</h2>
                               </div>
                               <div class="card-body">

                                       <div class="mb-4">
                                           <label for="email" class="form-label">Username/Email</label>
                                           <input type="text" class="form-control" id="email" />
                                       </div>
                                       <div class="mb-4">
                                           <label for="password" class="form-label">Password</label>
                                           <input type="password" class="form-control" id="password" />
                                       </div>
                                       <div class="mb-4">
                                           <input type="checkbox" class="form-check-input" id="remember" />
                                           <label for="remember" class="form-label">Remember Me</label>
                                       </div>
                                       <div class="d-grid">
                                           <button onclick="SubmitLogin()" class="btn text-light main-bg">Login</button>
                                       </div>
                                       <div class="sign-up mt-4">
                                           Don't have an account? <a href="/register" >Create Register</a>
                                       </div>

                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </div>
@endsection
<script>
    async function SubmitLogin(){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        if(email.length===0 || password.length===0){
            alert('please Enter Your User Name and Password !');
        }else {
            try{
                const formData = {
                    email: email,
                    password: password,
                };
                const res = await axios.post('/api/UserLogin',formData);
                if(res.status===200 && res.data['status']==='success'){
                    alert(res.data['message']);
                    window.location.href="/home"
                }else{
                    alert('Registration failed');
                }
            }catch (e) {
                console.log(e);
            }
        }
    }
</script>
