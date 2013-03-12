exec { "apt-update":
    command => "/usr/bin/apt-get update"
}

Exec["apt-update"] -> Package <| |>

include 'lamp'
include 'xdebug'

package { 'curl':
    ensure => installed,
}

package { 'php5-curl':
    ensure => installed,
}

exec { "Create-DB":
    command => "mysqladmin -u root -pChangeThis1 create ug_data",
    returns => ['0','1'],
    path    => "/usr/local/bin/:/bin/:/usr/bin",
}

exec { "Import-DB-Schema":
    command => "mysql -u root -pChangeThis1 ug_data < /vagrant/schema/ug-data-schema.sql",
    path    => "/usr/local/bin/:/bin/:/usr/bin",
}


