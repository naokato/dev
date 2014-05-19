#include <sys/types.h>
#include <unistd.h>
#include <stdio.h>
#include <string.h>

int main(void) {
    pid_t pid;
    char buffer[256];
    int pp[2];

    pipe(pp);
    pid = fork();

    if (pid==0) {
        printf("child\n");
        sleep(30);
    } else {
        printf("parent:child ps%d\n", pid);
    }
}
