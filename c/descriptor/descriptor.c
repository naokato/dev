#include <stdio.h>
#include <sys/types.h>
#include <sys/socket.h>

int main() {
    int sock;
    printf("fileno(stdin) = %d\n", fileno(stdin));
    close(0);

    sock = socket(AF_INET, SOCK_STREAM, 0);
    printf("scok=%d\n", sock);

}
