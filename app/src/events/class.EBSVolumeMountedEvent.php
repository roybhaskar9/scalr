<?php

class EBSVolumeMountedEvent extends AbstractServerEvent
{
    public $Mountpoint;
    public $VolumeID;
    public $DeviceName;

    /**
     *
     * @var DBServer
     */
    public $DBServer;

    public function __construct(DBServer $DBServer, $Mountpoint, $VolumeID, $DeviceName = null)
    {
        parent::__construct();

        $this->DBServer = $DBServer;
        $this->Mountpoint = $Mountpoint;
        $this->DeviceName	= $DeviceName;
        $this->VolumeID = $VolumeID;
    }

    public static function GetScriptingVars()
    {
        return array("mountpoint" => "Mountpoint", "volume_id" => "VolumeID", "device" => "DeviceName");
    }

    public function getTextDetails()
    {
        return "EBS volume {$this->VolumeID} successfully mounted to {$this->Mountpoint}";
    }
}
