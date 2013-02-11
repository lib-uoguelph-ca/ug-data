class xdebug::debian {

    include xdebug::params
    
    package { "xdebug":
        name   => $xdebug::params::pkg,
        ensure => installed,
        require => Class['lamp'],
    }
 
    file { '/etc/php5/conf.d/xdebug.ini':
	ensure => file,
	owner  => '0',
	group  => '0',
	mode   => '0644',
	content => 
	'
   xdebug.default_enable=1
	xdebug.remote_enable=1
	xdebug.remote_handler=dbgp
	xdebug.remote_host=33.33.33.1
	xdebug.remote_port=9000
	xdebug.remote_autostart=0
   ',
    }

    exec {'restart apache':
	command => '/etc/init.d/apache2 restart',
    }
}
