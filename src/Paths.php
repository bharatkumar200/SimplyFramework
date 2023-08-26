<?php

/**
 *  define path constants to be used throughout the application
 */

const DS = DIRECTORY_SEPARATOR;

const SRC_PATH = __DIR__ . DS;

define("ROOT_PATH", dirname(__DIR__) . DS);

const VENDOR_PATH = ROOT_PATH . 'vendor' . DS;

const PUBLIC_PATH = ROOT_PATH . 'public' . DS;

const CONFIG_PATH = ROOT_PATH . 'config' . DS;

const DATA_PATH = ROOT_PATH . 'data' . DS;
