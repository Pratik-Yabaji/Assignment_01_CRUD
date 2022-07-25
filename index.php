<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/index.css">
    <title>Assaignment_01</title>
    <script>
        function get_srno(srno)
        {
            document.getElementById('srno').value = Number(srno);
        }
    </script>
</head>

<body>
    <!-- Navbar Starts -->
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand text-white mx-auto" href="#"><b>Assaignment_01</b></a>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light text-dark " data-bs-toggle="modal" data-bs-target="#addModal">
                <b>Add</b>
            </button>
        </div>
    </nav>
    <!-- Navbar Ends -->

    <!-- Modal for Adding Students-->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./addStudents.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required name="name">
                            <div class="invalid-feedback">
                                Please fill your name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="roll_number" class="form-label">Roll Number</label>
                            <input type="text" class="form-control" id="roll_number" required name="roll_number">
                            <div class="invalid-feedback">
                                Please provide your Roll Number.
                            </div>
                        </div>
                        <div class="md-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department" required name="department">
                                <option selected disabled value="">Choose...</option>
                                <option>EE</option>
                                <option>CSE</option>
                                <option>MECH</option>
                                <option>CIVIL</option>
                                <option>Others..</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Department.
                            </div>
                        </div>
                        <div class="md-3">
                            <label for="hostel" class="form-label">Hostel</label>
                            <select class="form-select" id="hostel" required name="hostel">
                                <option selected disabled value="">Choose...</option>
                                <option>H01</option>
                                <option>H02</option>
                                <option>H03</option>
                                <option>H04</option>
                                <option>H05</option>
                                <option>H06</option>
                                <option>H07</option>
                                <option>H08</option>
                                <option>H09</option>
                                <option>H10</option>
                                <option>H11</option>
                                <option>H12</option>
                                <option>H13</option>
                                <option>H14</option>
                                <option>H15</option>
                                <option>H16</option>
                                <option>H17</option>
                                <option>H18</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Hostel.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <?php
    if (isset($_GET['q'])) {
        echo '<div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <strong>' . $_GET['q'] . '</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    ?>

    <!-- Table -->
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr.no.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Roll Number</th>
                    <th scope="col">Department</th>
                    <th scope="col">Hostel</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require "./dbConnect.php";
                $sql_dipaly_students = "SELECT * FROM `assaignment_01_db`.`students`";
                $result_display_students = mysqli_query($connect, $sql_dipaly_students);
                $num_results = mysqli_num_rows($result_display_students);
                $i = 1;

                while ($num_results >= $i) {
                    $data_row = mysqli_fetch_assoc($result_display_students);
                    echo '<tr>
                        <th scope="row">' . $i . '</th>
                        <td>' . $data_row['name'] . '</td>
                        <td>' . $data_row['roll_number'] . '</td>
                        <td>' . $data_row['department'] . '</td>
                        <td>' . $data_row['hostel'] . '</td>
                        <td>
                        <button type="button" class="btn btn-sm btn-dark text-white " data-bs-toggle="modal" data-bs-target="#editModal" id="'.$data_row['Sr.no.'].'" onClick="get_srno(this.id)">
                            <b>Edit</b>
                        </button>
                        </td>
                        <td>
                        <form action="deleteStudent.php?n=' . $data_row['Sr.no.'] . '" method="post">
                             <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                        </td>
                    </tr>';
                    ++$i;
                }

                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal for Editing Students-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./editStudent.php" method="post">
                        <div class="mb-3">
                            <label for="srno" class="form-label">Sr.no.</label>
                            <input type="text" class="form-control" id="srno" required name="srno" readonly>
                            <div class="invalid-feedback">
                                Please fill your name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required name="name">
                            <div class="invalid-feedback">
                                Please fill your name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="roll_number" class="form-label">Roll Number</label>
                            <input type="text" class="form-control" id="roll_number" required name="roll_number">
                            <div class="invalid-feedback">
                                Please provide your Roll Number.
                            </div>
                        </div>
                        <div class="md-3">
                            <label for="department" class="form-label">Department</label>
                            <select class="form-select" id="department" required name="department">
                                <option selected disabled value="">Choose...</option>
                                <option>EE</option>
                                <option>CSE</option>
                                <option>MECH</option>
                                <option>CIVIL</option>
                                <option>Others..</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Department.
                            </div>
                        </div>
                        <div class="md-3">
                            <label for="hostel" class="form-label">Hostel</label>
                            <select class="form-select" id="hostel" required name="hostel">
                                <option selected disabled value="">Choose...</option>
                                <option>H01</option>
                                <option>H02</option>
                                <option>H03</option>
                                <option>H04</option>
                                <option>H05</option>
                                <option>H06</option>
                                <option>H07</option>
                                <option>H08</option>
                                <option>H09</option>
                                <option>H10</option>
                                <option>H11</option>
                                <option>H12</option>
                                <option>H13</option>
                                <option>H14</option>
                                <option>H15</option>
                                <option>H16</option>
                                <option>H17</option>
                                <option>H18</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid Hostel.
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <div class="row bg-dark text-white fixed-bottom p-5">
        <div class="col-md-6"><h1>Assaignment_01</h1></div>
        <div class="col-md-6">
            <h2>Created by Pratik Yabaji</h2>
            <a class="text-white" href="https://pratik-yabaji.github.io/Portfolio-Website/"><h1><i class="bi bi-github"></i></h1></a>
        </div>
    </div>
</footer>
</html>