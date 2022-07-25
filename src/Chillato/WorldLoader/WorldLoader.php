<?php
declare(strict_types = 1);

namespace Chillato\WorldLoader;

use pocketmine\plugin\PluginBase;

use function array_diff;
use function scandir;

class WorldLoader extends PluginBase{

	public function onEnable() : void {
		foreach(array_diff(scandir($this->getServer()->getDataPath() . "worlds"), ["..", "."]) as $levelName){
			if($this->getServer()->getWorldManager()->loadWorld($levelName)){
				$this->getLogger()->info("§cWorldLoaderV2 §7>> §aSuccessfully loaded ${levelName}");
			}
		}
	}
}