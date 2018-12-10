<?php
namespace JiNexus\Config\Config;

use JiNexus\Config\Base\AbstractBase;

/**
 * Class AbstractConfig
 * @package JiNexus\Config\Config
 */
abstract class AbstractConfig extends AbstractBase implements ConfigInterface
{
    /**
     * @var
     */
    protected $config = [];

    /**
     * AbstractConfig constructor
     */
    public function __construct() { }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig($config = [])
    {
        $this->config = $config;
    }

    /**
     * Get a value and return $default if there is no element set.
     *
     * @param $needle
     * @param null $default
     * @return mixed|null
     */
    public function get($needle, $default = null)
    {
        if (array_key_exists($needle, $this->config)) {
            return $this->config[$needle];
        }

        return $default;
    }

    /**
     * Set a value in the config
     *
     * @param string $needle
     * @param $value
     * @return $this
     */
    public function set($needle = '', $value)
    {
        if ($needle) {
            $this->config[$needle] = $value;
        } else {
            $this->config[] = $value;
        }

        return $this;
    }

    /**
     * Magic method to get a config needle, forwards to $this->get()
     *
     * @param $needle
     * @return mixed|null
     */
    public function __get($needle)
    {
        return $this->get($needle);
    }

    /**
     * Magic method to set a config $needle, forwards to $this->set()
     *
     * @param string $needle
     * @param $value
     * @return $this
     */
    public function __set($needle = '', $value)
    {
        $this->set($needle, $value);

        return $this;
    }

    /**
     * Check if needle exist in the config
     *
     * @param $needle
     * @return bool
     */
    public function has($needle)
    {
        return array_key_exists($needle, $this->config);
    }
}