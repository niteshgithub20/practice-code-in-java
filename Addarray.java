import java.util.Scanner;
public class Addarray
{
public static void main(String[] args)
{
int i,j;
int m1[][]=new int[2][2];
int m2[][]=new int[2][2];
int m3[][]=new int[2][2];
Scanner sc=new Scanner(System.in);
System.out.println("Enter the first matrix number :");
for(i=0;i<2;i++)
{
for(j=0;j<2;j++)
{
m1[i][j]=sc.nextInt();
}
}
System.out.println("Enter the second matrix number :\n");
for(i=0;i<2;i++)
{
for(j=0;j<2;j++)
{
m2[i][j]=sc.nextInt();
}
}
System.out.println("The Added bothe matrix:");
for(i=0;i<2;i++)
{
for(j=0;j<2;j++)
{
m3[i][j]=m1[i][j]+m2[i][j];
}
}
System.out.println("The matrix added susscesfully!\n");
for(i=0;i<2;i++)
{
for(j=0;j<2;j++)
{
System.out.println(m3[i][j]+"");
}
System.out.println();
}
}
}
