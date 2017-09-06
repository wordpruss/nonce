<?php

namespace WordPruss\Notices;

/**
 * Notify
 *
 * Notices displayed near the top of admin pages.
 * The hook function should echo a message to be displayed.
 * @see https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices
 *
 * @author Mystro Ken <mystroken@gmail.com>
 * @since v1.0
 */
class Notify
{
    /**
     * @var Notice[]
     */
    public static $notices = [];


    /**
     * @param string $type
     * @param string $message
     * @param bool $isRemovable
     * @return Notice
     */
    public static function createNotice($type, $message, $isRemovable = true)
    {
        $notice = new Notice($type, $message, $isRemovable);
        return $notice;
    }


    /**
     * Add an error notice.
     *
     * @param $message
     * @param bool $isRemovable
     */
    public static function error($message, $isRemovable = true)
    {
        $notice = static::createNotice('error', $message, $isRemovable);
        if( !is_null($notice) ) static::$notices[] = $notice;
    }


    /**
     * Add an warning notice.
     *
     * @param $message
     * @param bool $isRemovable
     */
    public static function warning($message, $isRemovable = true)
    {
        $notice = static::createNotice('warning', $message, $isRemovable);
        if( !is_null($notice) ) static::$notices[] = $notice;
    }


    /**
     * Add an success notice.
     *
     * @param $message
     * @param bool $isRemovable
     */
    public static function success($message, $isRemovable = true)
    {
        $notice = static::createNotice('success', $message, $isRemovable);
        if( !is_null($notice) ) static::$notices[] = $notice;
    }


    /**
     * Add an info notice.
     *
     * @param $message
     * @param bool $isRemovable
     */
    public static function info($message, $isRemovable = true)
    {
        $notice = static::createNotice('info', $message, $isRemovable);
        if( !is_null($notice) ) static::$notices[] = $notice;
    }

    
    public static function hook()
    {
        add_action( 'admin_notices', [Notify::class, 'toHook'] );
    }

    public static function toHook()
    {
        if( is_array(static::$notices) && !empty(static::$notices) )
        {
            /** @var Notice $notice */
            foreach (static::$notices as $notice) echo $notice;
        }
    }
}