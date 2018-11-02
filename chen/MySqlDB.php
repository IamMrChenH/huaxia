<?php
/**
 * Created by PhpStorm.
 * User: chenhao
 * Date: 2018/11/2
 * Time: 10:40
 */

class MySqlDB
{

    public $servername = "localhost";
    public $username = "root";
    public $password = "root";
    public $dbname = "huaxia";
    public $conn = null;

    public function __construct($databaseName)
    {
        $this->dbname = $databaseName;
    }


    public function conn()
    {
        if ($this->conn != null) return $this->conn;
        // 创建连接
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        // 检测连接
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->conn->query('set names utf8');
        return $this->conn;
    }

    public function close()
    {
        $this->conn->close();
        $this->conn = null;
    }

    /**
     * @param $name 表名
     * @param mixed ...$datas 一个字段一个值
     * @return bool|mysqli_result
     */

    public function selectTable($name, ...$datas)
    {
        $sql = "select * from {$name} ";
        //True 为有值
        if ($datas) {
            $sql_read = " where";
            $max = count($datas);
            for ($i = 0; $i < $max; $i += 2) {
                if (($i + 1) != $max - 1)
                    $sql_read .= " {$datas[$i]}={$datas[$i+1]} and ";
                else
                    $sql_read .= " {$datas[$i]}={$datas[$i+1]}  ";
            }
            $sql .= $sql_read;
        }
        $conn = $this->conn();
        $result = $conn->query($sql);
        // echo "<br>$sql<br>";
        return $result;

    }

    public function selectTableSize($name, ...$datas)
    {
        $lenght = 0;
        try {
            $result = $this->selectTable($name, ...$datas);
            if ($result->num_rows > 0)
                while ($row = $result->fetch_assoc()) {
                    #echo $row["count"] . "<br>";
                    if ($row["count"] != 0)
                        $lenght = $row["count"];

                }
        } catch (Exception $e) {
            echo "MySqlDB->selectTableSize()报错拉！";
            return false;
        }
        return $lenght;
    }


    /**
     * @param $name表名
     * @param $ziduan 字段名
     * @param $data 字段数据
     * @param $gid 商品di
     * @return mixed 返回长度
     */
    public function updateTableData($name, ...$datas)
    {
        try {
            $sql = "update {$name} set {$datas[0]}={$datas[1]} ";
            $sql_read = " where";
            $max = count($datas);
            for ($i = 2; $i < $max; $i += 2) {
                if (($i + 1) != $max - 1)
                    $sql_read .= " {$datas[$i]}={$datas[$i+1]} and ";
                else
                    $sql_read .= " {$datas[$i]}={$datas[$i+1]}  ";
            }
            $sql .= $sql_read;
            #echo "<br>$sql<br>";

            $conn = $this->conn();
            $result = $conn->query($sql);
            if (!$result) return false;
            return true;
        } catch (Exception $e) {
            echo "MySqlDB->updateTableData()报错拉！";
            return false;
        } finally {
            $this->close();
        }
    }


    public function insertTable($name, ...$datas)
    {
        try {
            $sql = "insert into {$name}";
            $sql_read = "(";
            $max = count($datas);
            $ban = $max / 2;
            # echo "一般是".$ban;
            for ($i = 0; $i < $max; $i++) {
                if ($i < $ban - 1) {
                    $sql_read .= $datas[$i];
                    $sql_read .= ",";
                } else if ($i == $ban - 1) {
                    $sql_read .= $datas[$i];
                    $sql_read .= ")";
                    $sql_read .= "values";
                    $sql_read .= "(";
                } else if ($i > $ban - 1 && $i < $max - 1) {
                    $sql_read .= $datas[$i];
                    $sql_read .= ",";
                } else if ($i == $max - 1) {
                    $sql_read .= $datas[$i];
                    $sql_read .= ")";
                }

            }
            $sql .= $sql_read;
            # echo $sql."<br>";
            $conn = $this->conn();
            $result = $conn->query($sql);
            if (!$result) return false;
            return true;
        } catch (Exception $e) {
            echo "MySqlDB->insertTable()报错拉！";
            return false;
        } finally {
            $this->close();
        }
    }


}