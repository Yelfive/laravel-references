<?php

namespace Illuminate\Support\Facades {

    use Illuminate\Contracts\View\Factory;
    use Swift_Mailer;
    use Illuminate\Contracts\Events\Dispatcher;

    /**
     * @see \Illuminate\Support\Facades\Mail
     * @see \Illuminate\Mail\Mailer
     */
    class Mail
    {


        /**
         * The application instance being facaded.
         *
         * @var \Illuminate\Contracts\Foundation\Application
         */
        protected static $app;

        /**
         * The resolved object instances.
         *
         * @var array
         */
        protected static $resolvedInstance;

        /**
         * The view factory instance.
         *
         * @var \Illuminate\Contracts\View\Factory
         */
        protected $views;

        /**
         * The Swift Mailer instance.
         *
         * @var \Swift_Mailer
         */
        protected $swift;

        /**
         * The event dispatcher instance.
         *
         * @var \Illuminate\Contracts\Events\Dispatcher|null
         */
        protected $events;

        /**
         * The global from address and name.
         *
         * @var array
         */
        protected $from;

        /**
         * The global reply-to address and name.
         *
         * @var array
         */
        protected $replyTo;

        /**
         * The global to address and name.
         *
         * @var array
         */
        protected $to;

        /**
         * The queue implementation.
         *
         * @var \Illuminate\Contracts\Queue\Queue
         */
        protected $queue;

        /**
         * Array of failed recipients.
         *
         * @var array
         */
        protected $failedRecipients;

        /**
         * Replace the bound instance with a fake.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Mail::fake()
         */
        public static function fake()
        {
        }

        /**
         * Convert the facade into a Mockery spy.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Facade::spy()
         */
        public static function spy()
        {
        }

        /**
         * Initiate a mock expectation on the facade.
         *
         * @return \Mockery\Expectation
         * @see \Illuminate\Support\Facades\Facade::shouldReceive()
         */
        public static function shouldReceive()
        {
        }

        /**
         * Hotswap the underlying instance behind the facade.
         *
         * @param mixed $instance
         * @return null
         * @see \Illuminate\Support\Facades\Facade::swap()
         */
        public static function swap($instance)
        {
        }

        /**
         * Get the root object behind the facade.
         *
         * @return mixed
         * @see \Illuminate\Support\Facades\Facade::getFacadeRoot()
         */
        public static function getFacadeRoot()
        {
        }

        /**
         * Clear a resolved facade instance.
         *
         * @param string $name
         * @return null
         * @see \Illuminate\Support\Facades\Facade::clearResolvedInstance()
         */
        public static function clearResolvedInstance($name)
        {
        }

        /**
         * Clear all of the resolved instances.
         *
         * @return null
         * @see \Illuminate\Support\Facades\Facade::clearResolvedInstances()
         */
        public static function clearResolvedInstances()
        {
        }

        /**
         * Get the application instance behind the facade.
         *
         * @return \Illuminate\Contracts\Foundation\Application
         * @see \Illuminate\Support\Facades\Facade::getFacadeApplication()
         */
        public static function getFacadeApplication()
        {
        }

        /**
         * Set the application instance.
         *
         * @param \Illuminate\Contracts\Foundation\Application $app
         * @return null
         * @see \Illuminate\Support\Facades\Facade::setFacadeApplication()
         */
        public static function setFacadeApplication($app)
        {
        }

        /**
         * Create a new Mailer instance.
         *
         * @param \Illuminate\Contracts\View\Factory $views
         * @param \Swift_Mailer $swift
         * @param \Illuminate\Contracts\Events\Dispatcher|null $events
         * 
         * @see \Illuminate\Mail\Mailer::__construct()
         */
        public function __construct(Factory $views, Swift_Mailer $swift, Dispatcher $events = null)
        {
        }

        /**
         * Set the global from address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return null
         * @see \Illuminate\Mail\Mailer::alwaysFrom()
         */
        public static function alwaysFrom($address, $name = null)
        {
        }

        /**
         * Set the global reply-to address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return null
         * @see \Illuminate\Mail\Mailer::alwaysReplyTo()
         */
        public static function alwaysReplyTo($address, $name = null)
        {
        }

        /**
         * Set the global to address and name.
         *
         * @param string $address
         * @param string|null $name
         * @return null
         * @see \Illuminate\Mail\Mailer::alwaysTo()
         */
        public static function alwaysTo($address, $name = null)
        {
        }

        /**
         * Begin the process of mailing a mailable class instance.
         *
         * @param mixed $users
         * @return \Illuminate\Mail\PendingMail
         * @see \Illuminate\Mail\Mailer::to()
         */
        public static function to($users)
        {
        }

        /**
         * Begin the process of mailing a mailable class instance.
         *
         * @param mixed $users
         * @return \Illuminate\Mail\PendingMail
         * @see \Illuminate\Mail\Mailer::bcc()
         */
        public static function bcc($users)
        {
        }

        /**
         * Send a new message when only a raw text part.
         *
         * @param string $text
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Mail\Mailer::raw()
         */
        public static function raw($text, $callback)
        {
        }

        /**
         * Send a new message when only a plain part.
         *
         * @param string $view
         * @param array $data
         * @param mixed $callback
         * @return null
         * @see \Illuminate\Mail\Mailer::plain()
         */
        public static function plain($view, array $data, $callback)
        {
        }

        /**
         * Send a new message using a view.
         *
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return null
         * @see \Illuminate\Mail\Mailer::send()
         */
        public static function send($view, array $data = [], $callback = null)
        {
        }

        /**
         * Queue a new e-mail message for sending.
         *
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @param string|null $queue
         * @return mixed
         * @see \Illuminate\Mail\Mailer::queue()
         */
        public static function queue($view, array $data = [], $callback = null, $queue = null)
        {
        }

        /**
         * Queue a new e-mail message for sending on the given queue.
         *
         * @param string $queue
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return mixed
         * @see \Illuminate\Mail\Mailer::onQueue()
         */
        public static function onQueue($queue, $view, array $data, $callback)
        {
        }

        /**
         * Queue a new e-mail message for sending on the given queue.
         *
         * This method didn't match rest of framework's "onQueue" phrasing. Added "onQueue".
         *
         * @param string $queue
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return mixed
         * @see \Illuminate\Mail\Mailer::queueOn()
         */
        public static function queueOn($queue, $view, array $data, $callback)
        {
        }

        /**
         * Queue a new e-mail message for sending after (n) seconds.
         *
         * @param int $delay
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @param string|null $queue
         * @return mixed
         * @see \Illuminate\Mail\Mailer::later()
         */
        public static function later($delay, $view, array $data = [], $callback = null, $queue = null)
        {
        }

        /**
         * Queue a new e-mail message for sending after (n) seconds on the given queue.
         *
         * @param string $queue
         * @param int $delay
         * @param string|array $view
         * @param array $data
         * @param \Closure|string $callback
         * @return mixed
         * @see \Illuminate\Mail\Mailer::laterOn()
         */
        public static function laterOn($queue, $delay, $view, array $data, $callback)
        {
        }

        /**
         * Get the view factory instance.
         *
         * @return \Illuminate\Contracts\View\Factory
         * @see \Illuminate\Mail\Mailer::getViewFactory()
         */
        public static function getViewFactory()
        {
        }

        /**
         * Get the Swift Mailer instance.
         *
         * @return \Swift_Mailer
         * @see \Illuminate\Mail\Mailer::getSwiftMailer()
         */
        public static function getSwiftMailer()
        {
        }

        /**
         * Get the array of failed recipients.
         *
         * @return array
         * @see \Illuminate\Mail\Mailer::failures()
         */
        public static function failures()
        {
        }

        /**
         * Set the Swift Mailer instance.
         *
         * @param \Swift_Mailer $swift
         * @return null
         * @see \Illuminate\Mail\Mailer::setSwiftMailer()
         */
        public static function setSwiftMailer($swift)
        {
        }

        /**
         * Set the queue manager instance.
         *
         * @param \Illuminate\Contracts\Queue\Factory $queue
         * @return \Illuminate\Mail\Mailer
         * @see \Illuminate\Mail\Mailer::setQueue()
         */
        public static function setQueue(\Illuminate\Contracts\Queue\Factory $queue)
        {
        }

    }
}

namespace {
    class Mail extends Illuminate\Support\Facades\Mail
    {
    }
}