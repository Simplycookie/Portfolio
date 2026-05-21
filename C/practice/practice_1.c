#include <stdio.h>
char response;

int main() {
    scanf("%s",response);
    if(response == 'y' || response == 'Y'){printf("yes");}
    else{
        if(response=='n' || response=='N'){printf("no");}
        else{printf("invalid");}
    }
}