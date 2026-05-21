#include <stdio.h>
char choice;
float Total;
float quiz1,quiz2;

int main(){
    printf("Enter type of assesment(quiz)/(Assignments)\t: ");
    scanf("%s",&choice);
    switch(choice)
    {
    case 'q':
    case 'Q':
        printf("Enter Quiz 1 and Quiz 2 marks\t:");
        scanf("%f",&quiz1);
        scanf("%f",&quiz2);
        Total = quiz1 + quiz2;
        printf("\nAssessment type : Quiz\n ");
        printf("Quiz total : %.2f",Total);
        break;
    case 'a':
    case 'A':
        printf("Enter assignment marks\t: ");
        scanf("%f",&Total);
        printf("Status : ");
        if(Total<=100){
            if(Total<70){
                if(Total<50){
                    printf("Re-do Assignment");
                }
                else{
                    printf("Good");
                }

            }
            else{
                printf("excellent");
            }
        }   
        else{
            printf("Unavalible");
        }
    default:
        printf("Invalid assessment code entered");
        break;
    }
}