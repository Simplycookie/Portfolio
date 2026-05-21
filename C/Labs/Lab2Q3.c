//Muhammad Arfan, 243DC243FZ, TC1L
#include <stdio.h>
float BMR;
const float POUND = 2.20462;
const float INCH = 39.3701;
int age;
float Weight;
float Height;
int main(){
    printf("Enter height (m)    :");
    scanf("%f",&Height);
    printf("Enter weight (KG)   :");
    scanf("%f",&Weight);
    printf("Enter age           :");
    scanf("%d",&age);
    Weight = Weight*POUND;
    Height = Height*INCH;
    BMR = 66+(6.23*Weight)+(12.7*Height)-(6.8*age);
    printf("\nWeight   :%f",Height,"inches");
    printf("\nHeight   :%f",Weight,"pounds");
    printf("\nage%d",age);
    printf("\nBasal Metabolic Rate :%.2lf",BMR);
}