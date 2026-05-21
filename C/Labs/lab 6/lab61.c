#include <stdio.h>
#include <math.h>
char choice;
char get_choice(){
    char choice2='j';
    while (choice2!='A' && choice2!='S' && choice2!='M' && choice2!='D' && choice2!='E'){
        printf("choose a mathmatical operation\n");
        printf("A. Addition\n");
        printf("S. Subtraction\n");
        printf("M. Multiplication\n");
        printf("D. Division\n");
        printf("E. Exponent\n\n");
        printf("what is your choice? : ");
        fflush(stdin);
        scanf("%c",&choice2);
        return choice2;
    }
}
double calculate(int numm1, int numm2){
    float total=0;
    switch (choice)
    {
    case'A':
        total = numm1 + numm2;
        break;
    case'S':
        total = numm1 - numm2;
        break;
    case'M':
        total = numm1 * numm2;
        break;
    case'D':
        total = numm1 / numm2;
        break;
    case'E':
        total = pow(numm1,numm2);
        break;
    default:
        break;
    }
    return total;
}

int main()
{
    float num1,num2,total;
    choice = get_choice();
    printf("Enter 2 numbers :");
    scanf("%f",&num1);
    scanf("%f",&num2);
    total = calculate(num1,num2);
    printf("Answer : %.2f",total);
    return 0;
}
