#include <stdio.h>
#include <stdlib.h>

int main(void)
{
    char *buf = NULL;
    int i=1;
    while(1) {
        buf = (char *)malloc( 100 );
        if( buf == NULL ){
            printf( "メモリ確保に失敗しました\n" );
            return -1;
        }
        printf("%d\n", i);
        i++;
        sleep(0.001);
        free(buf);
        if (i == 200000) {
            sleep(20000);
        }
    }
}
