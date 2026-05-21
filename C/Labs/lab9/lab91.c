#include <stdio.h>
#include <string.h>
struct SalaryRecord
{
    int Employee_no;
    float Basic_salary;
    float EPF_amount;
    float Tax_amount;
    float Net_salary; 
};

void CalculateNetSalary(struct SalaryRecord Em[4]);

int main(){
    struct SalaryRecord Em[4];
    for (int i = 0; i < 4; i++)
    {
        printf("Employee %d\n", i+1);
        printf("\tEnter Employee Number :");
        scanf("%d", &Em[i].Employee_no);
        printf("\tEnter Employee Basic salary : Rm");
        scanf("%f", &Em[i].Basic_salary);
    }
    CalculateNetSalary(Em);
    for (int i = 0; i < 4; i++)
    {
        printf("\nEmployee \t\t %d",Em[i]);
        printf("\nEmployee \t\t %f",Em[i]);
        printf("\nEmployee \t\t %f",Em[i]);
        printf("\nEmployee \t\t %f",Em[i]);
        printf("\nEmployee \t\t %f",Em[i]);
        printf("\n");
    }
    
}

void CalculateNetSalary(struct SalaryRecord Em[4]){
    for (int i = 0; i < 4; i++)
    {
        Em[i].EPF_amount = Em[i].Basic_salary*0.11;
        if(Em[i].Basic_salary >= 10000){Em[i].Tax_amount = Em[i].Basic_salary * 0.15;}
        else if (Em[i].Basic_salary >= 5000){Em[i].Tax_amount = Em[i].Basic_salary * 0.10;}
        else if (Em[i].Basic_salary >= 5000){Em[i].Tax_amount = Em[i].Basic_salary * 0.8;}
        else if (Em[i].Basic_salary >= 5000){Em[i].Tax_amount = Em[i].Basic_salary * 0;}

        Em[i].Net_salary = Em[i].Basic_salary-Em[i].EPF_amount-Em[i].Tax_amount;
    }
}