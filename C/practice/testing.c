#include <stdio.h>
int x=0,k;
float y = 1;
k = 6;

int main(){
    x = k++;
    printf("%d",x);
    printf("%133.14f",y);
}
