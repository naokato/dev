#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>

#include <errno.h>

int main() {
    int sock0;
    struct sockaddr_in addr;
    struct sockaddr_in client;
    int len;
    int sock;
    char *str ="HTTP/1.1 200 OK";

    // create socket
    sock0 = socket(AF_INET, SOCK_STREAM, 0);
    if (sock0 < 0) {
        perror("message");
        printf("errno:%d\n", errno);
        return 1;
    }

    // setting socket
    addr.sin_family = AF_INET;
    addr.sin_port   = htons(12345);
    addr.sin_addr.s_addr = INADDR_ANY;
    bind(sock0, (struct sockaddr *) &addr, sizeof(addr));

    // listen
    listen(sock0, 5);

    len = sizeof(client);
    sock = accept(sock0, (struct sockaddr *) &client, &len);

    write(sock, str, sizeof(str));

    close(sock);
    close(sock0);

    return 0;

}

