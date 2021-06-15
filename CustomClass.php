<?php
namespace App\CustomClasses\Attendance;


class CustomLib
{
    public $zk;
    public function __construct()
    {
        //$this->zk = new \App\CustomClasses\Attendance\ZKLib("192.168.1.201", 4370);
        $this->zk = new \App\CustomClasses\Attendance\ZKLib(env('MACHINE_IP'), 4370);
        $ret = $this->zk->connect();
    }

    /**
     * @param $id
     * @param $userId
     * @param $name
     * @param $password
     * @param $role
     * @return bool
     */
    public function setUser($id, $userId, $name, $password, $role){
        try{
            if($this->zk->setUser($id,$userId,$name,$password,$role)==null){
                return true;
            }else{
                return false;
            }
        }
        catch (\Exception $e){
            return false;
        }
    }
    public function deleteUser($id){
        $this->zk->deleteUser($id);
    }
    public function getUser(){
        return $this->zk->getUser();
    }
    public function clearAttendance(){
        return $this->zk->clearAttendance();
    }
    public function restart(){
        return $this->zk->restart();
    }
}