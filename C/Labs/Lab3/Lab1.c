#include<stdio.h>
const double gravity = 9.8;
#define degreeconver 57.2958
int terminate = 0;
char choice = 'j';
float distancelmasslrad; 
float timeiheight; 
float speedjworkjdegree;

int main(){
    while(terminate == 0){
        printf("----------------------------\n");
        printf("  a. Calculate Speed\n");
        printf("  b. Calculate Work\n");
        printf("  c. Calculate Degrees\n");
        printf("----------------------------\n");
        scanf("%s",&choice);
        printf("%c",choice);
        switch (choice)
        {
        case 'a':
            printf("Please input distance(km) :");
            scanf("%f",&distancelmasslrad);
            printf("please input time    (s)  :");
            scanf("%f",&timeiheight);
            speedjworkjdegree = distancelmasslrad / timeiheight;
            printf("Speed is %.2fkm/h\n\n",speedjworkjdegree);
            break;
        case 'b':
            printf("Please input Mass (Kg) : ");
            scanf("%f",&distancelmasslrad);
            printf("please input hieght(m) : ");
            scanf("%f",&timeiheight);
            speedjworkjdegree = distancelmasslrad * timeiheight * gravity;
            printf("work is %.2f Joules\n\n",speedjworkjdegree);
            break;
        case 'c':
            printf("Please input radians : ");
            scanf("%f",&distancelmasslrad);
            speedjworkjdegree = distancelmasslrad * degreeconver;
            printf("%.2f radians is equal to %.2f degrees\n\n",distancelmasslrad,speedjworkjdegree);
            break;
        default:
            printf("invalid option, the program will termintate");
            terminate = 1;
            break;
        }
            

    }
    return 0;
}
    

