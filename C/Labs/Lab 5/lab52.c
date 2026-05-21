#include <stdio.h>
#include <math.h>
#define rate 1.05
char name[30],ID[30];
int years,yearlenth=1;
float total,fee;
float powerthis(float num,float exponent);
int main(){
    printf("Enter name                     :");
    gets(&name);
    printf("Enter ID                       :");
    scanf("%s",&ID);
    printf("Enter fee (RM)                 :");
    scanf("%f",&fee);
    printf("Enter duration of study (years):");
    scanf("%d",&years);
    printf("\n\n");
    printf("-----------------------------------\n");
    printf("       MULTIMEDIA-UNIVERSITY\n");
    printf("-----------------------------------\n");
    printf("Student name\t\t: %s\n",name);
    printf("Student ID\t\t: %s\n",ID);
    printf("Duration of study\t: %d\n\n",years);
    printf("Year\tCourse Fee\n");
    do
    {
        printf("%d\tRM %.2f\n",yearlenth,fee*(powerthis(rate,(yearlenth-1))));
        total += fee*(pow(rate,(yearlenth-1)));
        yearlenth ++;
    } while (yearlenth <= years); 
    printf("----------------------------------\n");
    printf("Total Course Fees\t: RM %.2f\n",total);
    printf("----------------------------------\n");

}

float powerthis(float num,float exponent){
    int counter = 1;
    float princible = num;
    if(exponent == 0){
        return 1;
    }
    while (counter < exponent){
        num = num * princible;
        counter ++;
    }
    return num;
}