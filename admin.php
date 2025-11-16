<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<button>
    <a href="login.php" class="nav-item nav-link">Logout</a>
</button><br>
    <h2 class="text-center mb-4">User Management</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $conn = new mysqli('localhost', 'root', '', 'ncc');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT  name, email, mobile FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    
            $email = 'test@example.com';
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["mobile"] . "</td>";
                    echo "<td>
                            <a href='update.php?email=" . $row["email"] . "' class='btn btn-warning btn-sm'>Update</a>
                            <a href='delete.php?email=" . $row["email"] . "' class='btn btn-danger btn-sm'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>No users found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
