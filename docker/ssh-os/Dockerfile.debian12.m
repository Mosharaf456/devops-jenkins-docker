FROM --platform=linux/amd64 debian:12-slim

RUN apt-get update && \
    apt-get install -y openssh-server && \
    apt-get clean

RUN mkdir -p /run/sshd

RUN useradd -m user1 && \
    passwd -d user1

RUN useradd -m user2 && \
    echo "user2:brotecs1230" | chpasswd

RUN echo "root:brotecs1230" | chpasswd

# Setup SSH keys for user2 and root
RUN mkdir -p /home/user2/.ssh && \
    mkdir -p /root/.ssh 
COPY ./dist/ssh-key/remote-key.pub /home/user2/.ssh/authorized_keys 
COPY ./dist/ssh-key/remote-key.pub /root/.ssh/authorized_keys

RUN chmod 700 /home/user2/.ssh /root/.ssh && \
    chmod 600 /home/user2/.ssh/authorized_keys /root/.ssh/authorized_keys && \
    chown -R user2:user2 /home/user2/.ssh && \
    chown -R root:root /root/.ssh

# Modify sshd_config to allow SSH access
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config && \
    echo "AllowUsers user1 user2 root" >> /etc/ssh/sshd_config && \
    echo "PasswordAuthentication yes" >> /etc/ssh/sshd_config && \
    echo "PermitEmptyPasswords yes" >> /etc/ssh/sshd_config && \
    echo "ChallengeResponseAuthentication no" >> /etc/ssh/sshd_config

RUN apt-get update && apt-get install -y \
    net-tools \
    telnet \
    procps \
    iputils-ping \
    python3 \
    && apt-get clean && \
    rm -rf /var/lib/apt/lists/*

EXPOSE 22

ENTRYPOINT ["/usr/sbin/sshd", "-D"]
