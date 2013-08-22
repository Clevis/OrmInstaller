<?php

namespace Clevis\Orm;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;


/**
 * Instalátor pro PetrP/Orm
 */
class OrmInstaller extends LibraryInstaller
{

	/**
	 * Kontrola podpory
	 */
	public function supports($packageType)
	{
		return $packageType === 'petrp-orm';
	}

	/**
	 * Instaluje balíček
	 */
	public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
	{
		parent::install($repo, $package);

		$installDir = $this->getPackageBasePath($package);
		$this->filesystem->removeDirectory($installDir . '/Builder/libs');
		$this->filesystem->removeDirectory($installDir . '/tests/libs');
	}

	/**
	 * Aktualizuje balíček
	 */
	public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
	{
		parent::update($repo, $initial, $target);

		$installDir = $this->getPackageBasePath($target);
		$this->filesystem->removeDirectory($installDir . '/Builder/libs');
		$this->filesystem->removeDirectory($installDir . '/tests/libs');
	}

}
