#include <stdio.h>

int main(void)
{
    char a[4] = "abc";
    char b[4] = "xyz";
    char * const p = a;
    p=b;
    printf("%s\n", p);
    return 0;
}
