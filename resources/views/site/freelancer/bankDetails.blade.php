@extends('site.layout')
@section('title', 'Signup')
@section('description', 'Description')
@section('keywords', 'keywords')
@section('style')
    <style>
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .toggle-password i {
            font-size: 18px;
            color: #999;
        }

        .toggle-password.active i:before {
            content: "\f070";
        }

        @media (max-width: 760px) {
            .wt-main-section {
                padding: 40px 0;
            }
        }
    </style>
@endsection
@section('content')
    {{-- Start Content Here --}}
    <main id="wt-main" class="wt-main wt-haslayout wt-innerbgcolor">
        <div class="wt-haslayout wt-main-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Account holder bank information</h4>
                                <hr>
                                <div class="wt-accountdel">
                                   
                                    <form class="wt-formtheme wt-userform">
                                        @csrf
                                        <fieldset class=" container">
                                        <div class="form-group form-group row">
                                                <label class="form-label" for="swiftCode">SWIFT Code<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                          
                                                <input id="swiftCode" type="txt" name="swiftCode" class="form-control"
                                                   >
                                            </div>
                                        <div class="form-group form-group row">
                                                <label class="form-label" for="ibanNumber">IBAN Number<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>IBAN is different than account number and many way by country</p>
                                                <input id="ibanNumber" type="txt" name="ibanNumber" class="form-control"
                                                   >
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                            <label class="form-label" for="postCode">Post Code<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Please enter the post code associated with your account</p>
                                                <input id="postCode" type="number" name="postCode" class="form-control"
                                                   >
                                            </div>
                                            <div class="form-group form-group col-md-6">
                                            
                                                <label class="form-label" for="category">Bank Account Type<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Type of bank Account</p>
                                                <span class="wt-select">
                                                    <select id="category" name="category" required>
                                                        <option disabled selected value="">Please select...</option>
                                                      
                                                            <option value="hh">'hh'
                                                            </option>
                                                       
                                                    </select>
                                                </span>
                                           
                                            </div>
                                            </div>
                                      
                                        
                                        
                                        <div class="form-group form-group row">
                                                <label class="form-label" for="bankName">Branch Name<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Name of the bank branch</p>
                                                <input id="bankName" type="txt" name="bankName" class="form-control"
                                                   >
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="fname">First Name<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="fname" type="text" name="fname" class="form-control"
                                                     required>
                                            </div>
                                            <div class="form-group form-group  col-md-6">
                                                <label class="form-label" for="lname">Last Name<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <input id="lname" type="text" name="lname" class="form-control"
                                                     required>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="dob">DOB<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="dob" type="date" name="dob" class="form-control"
                                                     required>
                                            </div>
                                            <div class="form-group form-group  col-md-6">
                                                <label class="form-label" for="nameOnAccount">Name on account<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                <input id="nameOnAccount" type="text" name="nameOnAccount" class="form-control"
                                                     required>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="city">City and state/province<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="city" type="date" name="city" class="form-control"
                                                     required>
                                            </div>
                                            <div class="form-group form-group  col-md-6">
                                            <label class="form-label" for="country">Country<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                
                                                <span class="wt-select">
                                                    <select id="country" name="country" required>
                                                        <option disabled selected value="">Select country</option>
                                                      
                                                            <option value="hh">'hh'
                                                            </option>
                                                       
                                                    </select>
                                                </span>
                                            </div>
                                            </div>
                                            <div class="form-group form-group row">
                                                <label class="form-label" for="address">Address<span
                                                        class="label-required"><span class="label-required">
                                                            *</span></label>
                                                            <p>Please enter the physical address associated with this account. if the postal address where you receive mail is different 
                                                                than the physical address where you reside, our bank requires you enter the physical address
                                                            </p>
                                                <input id="address" type="txt" name="address" class="form-control"
                                                   >
                                            </div>
                                        
                                          
                                            <div class="row">
                                            <div class="form-group form-group col-md-6">
                                                <label class="form-label" for="phone">Phone number<span
                                                            class="label-required"><span class="label-required">
                                                                *</span></label>
                                                <input id="phone" type="number" name="phone" class="form-control"
                                                     required>
                                            </div>
                                          
                                            </div>
                                            
                                          
                                            <div class="form-group form-group-half wt-btnarea row">
                                                <button type="submit" class="wt-btn singupBtn  wt-btn-sm">Submit</button>
                                            </div>
                                        </fieldset>
                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')

@endsection
