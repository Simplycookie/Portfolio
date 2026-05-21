#include <stdio.h>
#include <math.h>
#include <string.h>
char get_choice();
void calculate(char choice,int num1,int num2);

int main(){
    printf("A. Add numbers\nB. Multiply numbers");
    printf("\nC. Subract numbers\n D. Remainder of Numbers");
    printf("\nE. Power of numbers");
    char choice;
    choice = get_choice();
    int num1,num2;
    printf("Enter 2 numbers : ");
    scanf("%d%d",&num1,&num2);
    calculate(choice,num1,num2);
}

char get_choice(){
    char choice;



    printf("what is your choice? : ");
    scanf("%c",&choice);
    while (choice!='A' && choice!='B' && choice!='C' && choice!='D' && choice!='E')
    {
        printf("Your choice is invalid. what is your choice : ");
        scanf("%c",&choice);
    }
    return choice;
}

void calculate(char choice,int num1, int num2){
    float total;





    switch (choice)
    {
    case 'A':
        total = num1 + num2;
        break;
    case 'B':
        total = num1 * num2;
        break;
    case 'C':
        total = num1 - num2;
        break;
    case 'D':
        total = num1 % num2;
        break;
    case 'E':
        total = pow(num1,num2);
    default:
        break;
    }
    printf("Answer : %.2f",total);
}