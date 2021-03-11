FROM ubuntu:18.04
MAINTAINER Daspida

# Get current
RUN apt-get update -y && apt-get dist-upgrade -y

# Environment
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get install locales locales-all -y && locale-gen en_US.UTF-8
ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

RUN apt-get update && \
	apt-get install vim tmux git curl wget -y

# Install for machine
RUN apt-get install -y sudo wget apache2 libtinfo5 php libapache2-mod-php python

# Add user
RUN useradd -m daan && chmod 755 /home/daan
RUN echo "daan:ilovecats" | chpasswd
RUN echo "catz{AllY0uN3edIsL0v3AndACat}" > /home/daan/user.txt 
RUN chown daan:daan /home/daan/user.txt && chmod 755 /home/daan/user.txt

# Add files
ADD sources/ /var/www/html/
RUN rm /var/www/html/index.html
RUN chown -R www-data:www-data /var/www/html && a2enmod rewrite

# Root
RUN usermod -a -G sudo daan
RUN echo “In ancient times cats were worshipped as gods, they have not forgotten this. --Terry Pratchett--   rootcatz{D0ntB3l13v3Th31rL13s}” > /root/root.txt

# Clean up
RUN apt-get autoremove && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Expose the port for usage with the docker -P switch
EXPOSE 80

# Run Apache 2
CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]