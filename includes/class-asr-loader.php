<?php

/**
 * The core plugin loader class.
 *
 * Registers all actions and filters for the plugin.
 *
 * @package AI_Shopping_Ready
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class ASR_Loader {

    /**
     * Registered WordPress actions.
     *
     * @var array
     */
    protected $actions = array();

    /**
     * Registered WordPress filters.
     *
     * @var array
     */
    protected $filters = array();


    /**
     * Add a WordPress action to the loader.
     *
     * @param string $hook          WordPress action hook.
     * @param object $component     Object containing callback method.
     * @param string $callback     Callback method name.
     * @param int    $priority     Hook execution priority.
     * @param int    $accepted_args Number of accepted arguments.
     */
    public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {

        $this->actions[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args,
        );
    }


    /**
     * Add a WordPress filter to the loader.
     *
     * @param string $hook          WordPress filter hook.
     * @param object $component     Object containing callback method.
     * @param string $callback     Callback method name.
     * @param int    $priority     Hook execution priority.
     * @param int    $accepted_args Number of accepted arguments.
     */
    public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {

        $this->filters[] = array(
            'hook'          => $hook,
            'component'     => $component,
            'callback'      => $callback,
            'priority'      => $priority,
            'accepted_args' => $accepted_args,
        );
    }


    /**
     * Register all actions and filters with WordPress.
     */
    public function run() {

        foreach ( $this->actions as $hook ) {

            add_action(
                $hook['hook'],
                array( $hook['component'], $hook['callback'] ),
                $hook['priority'],
                $hook['accepted_args']
            );
        }

        foreach ( $this->filters as $hook ) {

            add_filter(
                $hook['hook'],
                array( $hook['component'], $hook['callback'] ),
                $hook['priority'],
                $hook['accepted_args']
            );
        }
    }
}
