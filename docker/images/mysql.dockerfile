FROM mysql:5.7.20

RUN echo ""                             >  /etc/mysql/conf.d/connection.cnf
RUN echo "[mysqld]"                     >> /etc/mysql/conf.d/connection.cnf
RUN echo "max_allowed_packet  = 1024MB" >> /etc/mysql/conf.d/connection.cnf
RUN echo "wait_timeout        = 604800" >> /etc/mysql/conf.d/connection.cnf
RUN echo "net_read_timeout    = 604800" >> /etc/mysql/conf.d/connection.cnf
RUN echo "net_write_timeout   = 604800" >> /etc/mysql/conf.d/connection.cnf


RUN echo ""                                       >  /etc/mysql/conf.d/innodb.cnf
RUN echo "[mysqld]"                               >> /etc/mysql/conf.d/innodb.cnf
RUN echo "innodb_buffer_pool_instances    = 8"    >> /etc/mysql/conf.d/innodb.cnf
RUN echo "innodb_read_io_threads          = 8"    >> /etc/mysql/conf.d/innodb.cnf
RUN echo "innodb_write_io_threads         = 8"    >> /etc/mysql/conf.d/innodb.cnf
RUN echo "innodb_buffer_pool_size         = 64M"  >> /etc/mysql/conf.d/innodb.cnf
RUN echo "innodb_io_capacity              = 1000" >> /etc/mysql/conf.d/innodb.cnf
RUN echo "innodb_io_capacity_max          = 2500" >> /etc/mysql/conf.d/innodb.cnf
