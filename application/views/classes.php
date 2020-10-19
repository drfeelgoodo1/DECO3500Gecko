<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/80dbd8c441.js" crossorigin="anonymous"></script>
    
    <style>
    body {
        min-height: 100vh;
        background-color: #fff;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
    }

	#wrapper {
		overflow-x: hidden;
	}

    #page-content-wrapper {
		min-width: 100vw;
	}

    .navbar {
		padding: 14px 20px;
		margin: 0;
	}

	.nav-link {
		padding: 0;
		font-size: 19.2px;
	}

    #sidebar-wrapper {
        max-height: 48px;
    }

    .sidebar-heading {
		padding: 0.875rem 1.25rem;
		font-size: 1.2rem;
        width: 240px;
	}

    #main {
        margin-left: -240px;
        margin-right: 240px;
        padding: 35px;
        padding-left: 60px;
        padding-right: 60px;
        min-height: 90vh;
    }

    table {
        width: 100%;
    }

    /* .input-group.md-form.form-sm.form-1 input{
        border: 1px solid #bdbdbd;
        border-top-right-radius: 0.25rem;
        border-bottom-right-radius: 0.25rem;
    } */

    
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <div class="border-right bg-light" id="sidebar-wrapper">
            <div class="sidebar-heading" style="background-color: #6ac6db">Class Buddy</div>
        </div>
        
        <div id="page-content-wrapper">
            
            <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="background-color: #6ac6db">
                
                <div class="container-fluid">
                    
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('Welcome/'); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Classes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Teams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Rewards</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div id="main">
                <h2>Classes</h2>

                <button type="button" class="btn btn-info">Add student</button>

                <div class="input-group md-form form-sm form-1 pl-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search">
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr class="table-secondary">
                            <th scope="col">STUDENT NAME</th>
                            <th scope="col">STUDENT ID</th>
                            <th scope="col">ATTENDANCE</th>
                            <th scope="col">TEAM</th>
                            <th scope="col">DIETARY</th>
                            <th scope="col">EXTRA</th>
                            <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student_list as $student) { ?>
						<tr>
							<td><?php echo $student->name; ?></td>
							<td><?php echo $student->student_id; ?></td>
                            <td><?php echo $student->days_attended; ?></td>
                            <td><?php echo $student->team; ?></td>
                            <td><?php echo $student->dietary; ?></td>
                            <td><?php echo $student->extra; ?></td>
						</tr>
						<?php } ?>
                    </tbody>
                </table>
            </div>
            
        </div>

    </div>
</body>