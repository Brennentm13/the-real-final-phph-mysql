<!DOCTYPE>
<html>
    <head>
        <body>
            <div>
            <h1>Todo Form</h1>
            <form method="POST">
                <label for="task">Task:</label>
                <input id="todo" type="text" name="todo">
                <button type="submit">Add To List</button>
            </form>
            </div>
            
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db = "todos";
        
            $conn = mysqli_connect($servername, $username, $password, $db);
            
            $tasks = $_POST[todo];
            
            $sql = "INSERT INTO todo_list(tasks)
            VALUES('$tasks');
            ";
            
            if ($conn->query($sql)){
            } else {
                echo "error: " . $conn->error;
            }
            
            $sql = "SELECT * FROM todo_list";
            $result = $conn->query($sql);
            if ($result->num_rows > 0 ) {
                foreach($result as $object){ ?>
                  <li><?php  echo $object['tasks']; ?></li>
              <?php  }
            } 
            
            ?>
        </body>
    </head>
</html>