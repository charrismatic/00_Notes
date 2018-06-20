- **systemctl**:

  ```
  $ sudo systemctl start docker
  ```

- **service**:

  ```
  $ sudo service docker start
  ```

sudo systemctl daemon-reload



sudo systemctl start docker



```
export DOCKER_HOST="tcp://0.0.0.0:2375"
```

```
export DOCKER_TLS_VERIFY=1
```



1. ```
   sudo systemctl daemon-reload
   ```

2. ​

/var/run/docker.sock/var/run/docker.sock/var/run/docker.sock









## Configure Docker to start on boot

Most current Linux distributions (RHEL, CentOS, Fedora, Ubuntu 16.04 and higher) use [`systemd`](https://docs.docker.com/install/linux/linux-postinstall/#systemd) to manage which services start when the system boots. Ubuntu 14.10 and below use [`upstart`](https://docs.docker.com/install/linux/linux-postinstall/#upstart).

### `systemd`

```
$ sudo systemctl enable docker
```

To disable this behavior, use `disable` instead.

```
$ sudo systemctl disable docker
```

If you need to add an HTTP Proxy, set a different directory or partition for the Docker runtime files, or make other customizations, see[customize your systemd Docker daemon options](https://docs.docker.com/engine/admin/systemd/).

### `upstart`

Docker is automatically configured to start on boot using `upstart`. To disable this behavior, use the following command:

```
$ echo manual | sudo tee /etc/init/docker.override
```

### `chkconfig`

```
$ sudo chkconfig docker on
```

```
export DOCKER_HOST=tcp://$HOST:2376 DOCKER_TLS_VERIFY=1
```