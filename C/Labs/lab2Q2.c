//Muhammad Arfan, 243DC243FZ, TC1L
#include <stdio.h>
#define pi 3.1415926535897932384626433832795
float r = 0;
float t = 0;
float cv = 0;
int main(){
    printf("Enter radius (cm)   :");
    scanf("%f",&r);
    printf("Enter time (s)      :");
    scanf("%f",&t);
    cv = 2*r/t*pi;
    printf("\nRadius   :%f",r);
    printf("\ntime     :%f",t);
    printf("\nCircular Velocity :%f",cv);
    return 0;
}
