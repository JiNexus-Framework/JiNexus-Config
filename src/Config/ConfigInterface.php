<?php
namespace JiNexus\Config\Config;

use JiNexus\Config\Base\BaseInterface;
use JiNexus\ModuleManager\ModuleManager\ModuleManager;

/**
 * Interface ConfigInterface
 * @package JiNexus\Config\Config
 */
interface ConfigInterface extends BaseInterface
{
    /**
     * ConfigInterface constructor
     */
    public function __construct();

    /**
     * @return array
     */
    public function getConfig();

    /**
     * @param array $config
     */
    public function setConfig($config = []);

    /**
     * Get a value and return $default if there is no element set.
     *
     * @param $needle
     * @param null $default
     * @return mixed|null
     */
    public function get($needle, $default = null);

    /**
     * Set a value in the config
     *
     * @param string $needle
     * @param $value
     * @return $this
     */
    public function set($needle = '', $value);

    /**
     * Magic method to get a config needle, forwards to $this->get()
     *
     * @param $needle
     * @return mixed|null
     */
    public function __get($needle);

    /**
     * Magic method to set a config $needle, forwards to $this->set()
     *
     * @param string $needle
     * @param $value
     * @return $this
     */
    public function __set($needle = '', $value);

    /**
     * Check if needle exist in the config
     *
     * @param $needle
     * @return bool
     */
    public function has($needle);
}