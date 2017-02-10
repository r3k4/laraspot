@include('public/index.php')

@servers(['web' => [env("IP_SERVER_RADIUS")]])



@task('kickUser', ['on' => 'web'])

	echo User-Name={{ $username }},Framed-IP-Address={{ $ip }}|/usr/bin/radclient -x {{ $na_ip }}:1700 disconnect {{ $nas_secret }}


@endtask

