@extends('layout.authlayout');
@section('title','Registration Page')
@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <div class="home_page">
        <div class="port_wr">
            <div class="main-bg">
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-lg-8 col-md-6 col-sm-6">
                            <div class="card shadow">
                                <div class="card-title text-center border-bottom">
                                    <h2 class="p-3">Register</h2>
                                </div>
                                <div class="card-body">

                                        <div class="custom_row">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="f_name" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="f_name" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="l_name" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="l_name" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="custom_row">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="mobile" class="form-label">Mobile</label>
                                                        <input type="text" class="form-control" id="mobile" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="email" class="form-label">Username/Email</label>
                                                        <input type="email" class="form-control" id="email" />
                                                    </div>
                                                </div>
                                            </div>
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
                                            <button onclick="SubmitRegister()" class="btn text-light main-bg">Register</button>
                                        </div>
                                        <div class="sign-up mt-4">
                                            I have an account? <a href="/login" >LogIn</a>
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
    const registerForm = document.getElementById('registerForm');


    async function SubmitRegister() {
        let f_name = document.getElementById('f_name').value;
        let l_name = document.getElementById('l_name').value;
        let mobile = document.getElementById('mobile').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        if(f_name.length===0 || l_name.length===0 || mobile.length===0 || email.length===0 ||password.length===0){
            alert('Please Enter Your Data !');
        }else {
            const formData = {
                firstName: f_name,
                lastName: l_name,
                email: email,
                mobile: mobile,
                password: password,
            };
            try{
                const res = await axios.post('/api/UserRegistration',formData);
                if(res.status===200 && res.data['status']==='success'){
                    alert(res.data['message']);
                    window.location.href="/login"
                }else{
                    alert('Registration failed');
                }
            }catch (e){
                console.log(e);
            }
        }

    }
</script>
