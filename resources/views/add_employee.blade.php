@extends('layouts.admin')

@section('content')
{{--  --}}
<style type="text/css">
	.button {
        padding: 10px 50px;
        margin: 10px 4px;
        color: #000;
        font-family: sans-serif;
        text-transform: uppercase;
        text-align: center;
        position: relative;
        text-decoration: none;
        display: inline-block;
        border: 3px solid;
        background: yellow;
      }
      .button::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        height: 100%;
        z-index: -1;
        -webkit-transform: scaleY(0.1);
        transform: scaleY(0.1);
        transition: all 0.4s;
      }
      .button:hover {
        color: #b414ba;
      }
      .button:hover::before {
        opacity: 1;
        background-color: #f7c2f9;
        -webkit-transform: scaleY(1);
        transform: scaleY(1);
        transition: -webkit-transform 0.6s cubic-bezier(0.08, 0.35, 0.13, 1.02), opacity 0.4s;
        transition: transform 0.6s cubic-bezier(0.08, 0.35, 0.13, 1.02), opacity;
      }
</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">ADD Employees</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Hoemtex Admin</a></li>
                                <li class="breadcrumb-item active">Add Employees</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            
            <!-- end row -->
            {{-- start Form --}}
            <body>

				<form class="form-inline" action="/insert-employee" method="POST" enctype="multipart/form-data">
					<h1>Employee form please Fill-up for new Employee</h1><hr>
					@csrf
					<table style="overflow-x:auto; width: 100%">
						<tr>
							<td> <label for="name"><b>Name</b></label></td>
							<td > <input style="width:70%" type="text" placeholder="Full Name" name="name" id="name" required></td>
						</tr>

						<tr>
							<td> <label for="email"><b>Email</b></label></td>
							<td> <input style="width:70%" type="email" placeholder="Employee Email Address" name="email" id="email" required></td>
						</tr>
						<tr>
							<td> <label for="nid_no"><b>NID NO</b></label></td>
							<td> <input style="width:70%" type="number" placeholder="Employee NID No " name="nid_no" id="nid_no" required></td>
						</tr>

						<tr>
							<td> <label for="phone">Employee Contact No</label></td>
							<td> <input style="width:70%" type="text" placeholder="Employee Phone Number" id="phone" name="phone" ng-model="phone" ng-disabled="AutoConfirmed" ng-pattern="/^(?:\+88|01)?\d{11}\r?$/" required></td>
						</tr>

						<tr>
							<td> <label for="address"><b>Address</b></label></td>
							<td> <input style="width:70%" type="text" placeholder="Employee address" name="address" id="address" required></td>
						</tr>

						<tr>
							<td> <label for="experiance"><b>Experiance</b></label></td>
							<td> <input style="width:70%" type="text" placeholder="Full experiance" name="experiance" id="experiance"></td>
						</tr>
						<tr>
							<td> <label for="salary"><b>Employee salary</b></label></td>
							<td> <input style="width:70%" type="number" placeholder="Per Month Employee salary" name="salary" id="salary" required></td>
						</tr>
						<tr>
							<td> <label for="vacation"><b>Yearly Employee Vacation</b></label></td>
							<td> <input style="width:70%" type="number" placeholder="vacation Count" name="vacation" id="vacation" ></td>
						</tr>
						<tr>
							<td> <label for="city"><b>Employee Permanent City</b></label></td>
							<td> <input style="width:70%" type="text" placeholder="Employee City Name" name="city" id="city" required></td>
						</tr>
						<tr>
							<td> <label for="department"><b>Department</b></label></td>
							<td> <select style="width:70%" id="department" name="department" required>
								    <option value="saab">Admin</option>
								    <option value="saab">Management</option>
								    <option value="volvo">Cash</option>
								    <option value="saab">Sales</option>
								    <option value="saab">Cleaning</option>
								  </select></td>
						</tr>
						<tr>
							<td> <label for="store_name"><b>Store Name</b></label></td>
							<td> <select style="width:70%" id="store_name" name="store_name" required>
								    <option value="volvo">Gulshan 2 Police Plaza</option>
								    <option value="saab">Santinagar</option>
								  </select>
							</td>
						</tr>
						<tr>
							<td> <label for="photo"><b>Employee image:</b></label></td>
							<td>
								<img id="image" src="#" />
								<input type="file" id="photo" name="photo" required accept="image/*" class="upload" onchange="readURL(this);">
							</td>
						</tr>
				    
					</table>

				    
				   
				    <div style="text-align: center;">
				    	<input class="button" type="reset" value="Reset">
				    	<button type="submit" class="button">Save Employee</button>
				    </div>
				</form>

</body>

            {{-- End Form --}}

            
        
    </div>
    <!-- End Page-content -->
   
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script> © HOMETEX BANGLADESH.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Shahadath Hossain
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script type="text/javascript">
    	function readURL(input) {
    		if (input.files && input.files[0]){
    		var reader = new FileReader();
    		reader.onload = function (e) {
    			$('#image')
    			.attr('src', e.target.result)
    			.width(80)
    			.height(80);
    		};
    		reader.readAsDataURL(input.files[0]);
    		}
    	}
    </script>
</div>
@endsection