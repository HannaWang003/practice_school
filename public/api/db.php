<?php
date_default_timezone_set('Asia/Taipei');
session_start();
//2
function go($ary)
{
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
function to($url)
{
    header("location:$url");
}
//class
class DB
{
    //3
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db01s";
    protected $pdo;
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, 'root', '');
    }
    private function a2s($arry)
    {
        foreach ($arry as $col => $val) {
            $tmp[] = "`$col`='$val'";
        }
        return $tmp;
    }
    private function sql_all($sql, $where, $other)
    {
        if (is_array($where)) {
            $sql .= " where " . join(" && ", $this->a2s($where));
        } else {
            $sql .= " $where";
        }
        $sql .= " $other";
        return $sql;
    }
    private function math($math, $col, $where = '', $other = '')
    {
        $sql = "select $math(`$col`) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function all($where = '', $other = '')
    {
        $sql = "select * from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function count($where = '', $other = '')
    {
        $sql = "select count(*) from `$this->table` ";
        $sql = $this->sql_all($sql, $where, $other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function save($array)
    {
        if (isset($array['id'])) {
            $sql = "update `$this->table` set ";
            $sql .= join(",", $this->a2s($array));
            $sql .= " where `id`='{$array['id']}'";
        } else {
            $sql = "insert into `$this->table` ";
            $col = "(`" . join("`,`", array_keys($array)) . "`)";
            $val = "('" . join("','", $array) . "')";
            $sql .= "{$col} values {$val}";
        }
        return $this->pdo->exec($sql);
    }
    function find($id)
    {
        $sql = "select * from `$this->table` ";
        if (is_array($id)) {
            $sql .= " where " . join(" && ", $this->a2s($id));
        } elseif (is_numeric($id)) {
            $sql .= " where `id`='{$id}'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id)
    {
        $sql = "delete from `$this->table` ";
        if (is_array($id)) {
            $sql .= " where " . join(" && ", $this->a2s($id));
        } elseif (is_numeric($id)) {
            $sql .= " where `id`='{$id}'";
        }
        return $this->pdo->exec($sql);
    }
    function q($sql)
    {
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
$Mvim = new DB('mvim');
$News = new DB('news');
$Image = new DB('image');
$Menu = new DB('menu');
$Admin = new DB('admin');
$Title = new DB('title');
$Ad = new DB('ad');
$Total = new DB('total');
$Bot = new DB('bot');
if (!isset($_SESSION['visited'])) {
    $total = $Total->find(1);
    $total['total']++;
    $Total->save($total);
    $_SESSION['visited'] = 1;
}
